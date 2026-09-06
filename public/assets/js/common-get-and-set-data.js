async function fetchAndSetData(apiUrl, fieldMap) {
    try {
        const response = await axios.get(apiUrl);

        const data = response.data.data;
        if (!data) {
            return;
        }

        Object.entries(fieldMap).forEach(([field, config]) => {
            const value = data[field];
            if (value === null || value === undefined) {
                return;
            }
            // Image
            if (typeof config === 'object' && config.type === 'image') {

                const element = document.getElementById(config.id);

                if (element) {
                    element.src = `${window.location.origin}/${config.path}/${value}`;
                }
            }
            // Normal input / textarea
            else {

                const elementId = typeof config === 'object' ? config.id : config;
                const element = document.getElementById(elementId);
                if (element) {
                    element.value = value;
                }
            }
        });

    } catch (error) {

        if (error.response) {

            const status = error.response.status;
            const data = error.response.data;

            if (status === 500) {
                if (data && data.message) {
                    errorToast(data.message);
                } else if (data && data.error) {
                    errorToast(data.error);
                } else {
                    errorToast("Server error. Please try again later.");
                }

            } else if (status === 401) {
                errorToast("Unauthorized request");
            } else if (status === 422) {
                errorToast("Validation failed. Please check your input.");
            } else if (status === 404) {
                errorToast("API endpoint not found");
            } else {
                errorToast(
                    data?.message ||
                    data?.error ||
                    "Something went wrong"
                );
            }

        } else if (error.request) {

            errorToast(
                "Network error. Please check your internet connection."
            );

        } else {

            errorToast(
                error.message ||
                "An unexpected error occurred"
            );
        }
    }
}