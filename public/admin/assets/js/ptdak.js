// global function
var CrmApp = {
    getCsrfToken: function() {
        return jQuery('meta[name="csrf-token"]').attr('content');
    },
    getUserNotifications: function () {
        jQuery.ajax({
            url: "/book/notification",
            method: "GET",
            data: {
                //
            },
            success: function (response) {
                // localStorage.setItem("notifications", JSON.stringify(response.data));
                // localStorage.setItem("notifications-pensiun", JSON.stringify(response.pensiun));
                // CrmApp.showNotifications();
                jQuery("#notification-count").html(response.pensiun.length + response.data.length);
                let html = '';
                jQuery.each(response.pensiun, function (key, row) {
                    // let tmt_golongan = null
                    // if (row.book_active != null) {
                    //     tmt_golongan = row.book_active.tmt_golngan
                    // } else {
                    //     tmt_golongan = ''
                    // }
                    if (row.notifikasi_pensiun_2_at) {
                        html += `
                            <li class="notification-item">
                                <i class="bi bi-info-circle text-info"></i>
                                <span class="notifkasi-2" onclick="readNotifkasi2(${row.id})">
                                    <div>
                                        <h4>${row.name}</h4>
                                        <p>MPP: ${row.notifikasi_pensiun_1_at.substr(0,10)}</p>
                                        <p>Status: ${row.tanggal_terakhir_pensiun}</p>
                                    </div>
                                </span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        `;
                    } else {
                        html += `
                            <li class="notification-item">
                                <i class="bi bi-info-circle text-info"></i>
                                <a href="/karyawan/${row.id}/pensiun">
                                    <div>
                                        <h4>${row.name}</h4>
                                        <p>MPP: ${row.notifikasi_pensiun_1_at.substr(0,10)}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        `;
                    }
                    
                });
                jQuery.each(response.data, function (key, row) {
                    let url = '/book'
                    if (row.is_pilihan === 1) {
                        url = '/pilihan'
                    }
                    html += `
                        <li class="notification-item">
                            <i class="bi bi-info-circle text-info"></i>
                            <a href="${url}?read_book_id=${row.id}">
                                <div>
                                <h4>${row.karyawan.name}</h4>
                                <p>TMT Golongan: ${row.tmt_golongan || ''}</p>
                                <p>TMT Eselon: ${row.tmt_eselon || ''}</p>
                                <p>Kenaikan Golongan: ${(row.reguler === 0 ? "Pilihan" : "Reguler")}</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    `;
                });
                jQuery("ul.notifications").append(html);
            },
        });
    },
    showNotifications: function () {
        let notifications = JSON.parse(localStorage.getItem("notifications"));
        let notifications_pensiun = JSON.parse(localStorage.getItem("notifications-pensiun"));
        let html = "";

        if (notifications.length > 0) {
            jQuery("#notification-count").html(notifications.length + notifications_pensiun.length);
            jQuery.each(notifications, function (key, notification) {
                html += "\
                    <li class=\"notification-item\">\
                        <i class=\"bi bi-info-circle text-info\"></i>\
                        <div>\
                            <h4>" + notification.name + "</h4>\
                            <p>TMT Golongan: " + notification.tmt_golongan + "</p>\
                            <p>TMT Eselon: " + notification.tmt_eselon + "</p>\
                            <p>Kenaikan Golongan: " + (notification.reguler === 0 ? "Pilihan" : "Reguler") + "</p>\
                            </div>\
                    </li>\
                    <li>\
                        <hr class=\"dropdown-divider\">\
                    </li>\
                ";
            });
            jQuery.each(notifications_pensiun, function (key, notification) {
                html += `
                    <li class="notification-item">
                        <i class="bi bi-info-circle text-info"></i>
                        <div>
                        <a href="/karyawan/${notification.id}/pensiun">
                            <div>
                                <h4>${notification.name}</h4>
                                <p>MPP: ${notification.notifikasi_pensiun_1_at.substr(0,10)}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                `;
            });
            jQuery("ul.notifications").append(html);
        } else {
            // <h4>Aduh Maaf Nih Kamu Tidak Dapat Menemukan ini Malahan Dapat Cewek Cantik Nih !!</h4>
        }
    },
    buttonDelete: function (el) {
        let endpoint = jQuery(el).data("url");
        let title = jQuery(el).data("text");

        Swal.fire({
            title: "Are you sure?",
            html: "You are trying to delete <strong>\"" + title + "\"</strong>.<br> This action cannot be undone.",
            icon: "warning",
            showLoaderOnConfirm: true,
            showCancelButton: true,
            showCloseButton: true,
            reverseButtons: true,
            backdrop: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary"
            },
            preConfirm: () => {
                
                return new Promise(function(resolve) {
                    jQuery.ajax({
                        type: "POST",
                        url: endpoint,
                        data: {
                            _token: CrmApp.getCsrfToken(),
                            _method: "DELETE"
                        },
                        dataType: "JSON",
                    })
                    .done(function(response) {
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        // table.ajax.reload();
                        location.reload();
                    })
                    .fail(function() {
                        Swal.fire("Oops...", "Something went wrong with ajax !", "error");
                    });
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            //
        });
    },
    init: function () {
        CrmApp.getUserNotifications();

        jQuery(document).on("click", ".btn-action.delete", function() {
            let el = jQuery(this);
            CrmApp.buttonDelete(el);
        });
    }
};

jQuery(document).ready(function () {
    
    CrmApp.init();
});