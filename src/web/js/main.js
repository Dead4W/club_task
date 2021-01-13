
app = {

    registerForms: function() {
        let forms = $(".__form");

        for( let i = 0;i<forms.length;i++ ) {
            let form = forms[i];

            form.onsubmit = (e) => {

                let data = $(form).serialize();

                app.ajax(form.dataset.method, data, (data) => {
                    $("#result").text(data.data);
                });

                return false;
            };
        }
    },

    init: function() {
        app.registerForms();
    },

    ajax: function(method, data, callback) {
        $.ajax({
            url: '/ajax/' + method,
            method: "POST",
            data: data,
        }).done(callback);
    },

}

document.addEventListener('DOMContentLoaded', app.init);
