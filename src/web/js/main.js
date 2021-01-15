
app = {

    registerForms: function() {
        let forms = $(".__form");

        for( let i = 0;i<forms.length;i++ ) {
            let form = forms[i];
            window.testvar = form;

            form.onsubmit = (e) => {

                let data = $(form).serialize();

                app.ajax(form.dataset.method, data, (data) => {
                    let title;
                    if("error" in data) {
                        title = data.error.title;
                    } else {
                        title = data.data;
                    }
                    $("#result").text(title);
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
