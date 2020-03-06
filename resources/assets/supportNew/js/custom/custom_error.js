function errorHandeler(fieldsError, err) {
    if (err.responseJSON.errors) {
        if (fieldsError.fields) {
            let errors = Object.keys(err.responseJSON.errors);
            fieldsError.fields.forEach(function(field, index) {
                let errorDiv = $('[data-inputName="' + field + '"]').siblings(
                    ".errorMessage"
                );
                errors.forEach(function(errField, index) {
                    if (errors.includes(field)) {
                        errorDiv.empty();
                        errorDiv.append(err.responseJSON.errors[field]);
                    } else {
                        errorDiv.empty();
                    }
                });
            });
        }
    }
}
