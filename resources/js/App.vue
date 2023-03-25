<template>
    <div class="container">
        <h2>Search Data</h2>
        <form @submit.prevent="submitForm" class="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="searchParams.name" class="form-control">
            </div>
            <div class="form-group">
                <label for="bedrooms">Bedrooms:</label>
                <input type="number" id="bedrooms" v-model.number="searchParams.bedrooms" class="form-control">
            </div>
            <div class="form-group">
                <label for="bathrooms">Bathrooms:</label>
                <input type="number" id="bathrooms" v-model.number="searchParams.bathrooms" class="form-control">
            </div>
            <div class="form-group">
                <label for="storeys">Storeys:</label>
                <input type="number" id="storeys" v-model.number="searchParams.storeys" class="form-control">
            </div>
            <div class="form-group">
                <label for="garages">Garages:</label>
                <input type="number" id="garages" v-model.number="searchParams.garages" class="form-control">
            </div>
            <div class="form-group">
                <label for="price-from">Price From:</label>
                <input type="number" id="price-from" v-model.number="searchParams.price_min" class="form-control">
            </div>
            <div class="form-group">
                <label for="price-to">Price To:</label>
                <input type="number" id="price-to" v-model.number="searchParams.price_max" class="form-control">
            </div>
            <button v-bind:disabled="isButtonDisabled" type="submit"
                    class="btn btn-primary btn-lg col-auto col mt-3 mb-3 d-flex justify-center">
                Search

                <div v-if="isLoading" class="ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-repeat bi-spin" viewBox="0 0 16 16">
                        <path
                              d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                        <path fill-rule="evenodd"
                              d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                    </svg>
                </div>

            </button>
        </form>

        <div v-if="isLoading">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-arrow-repeat bi-spin" viewBox="0 0 16 16">
                <path
                      d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                <path fill-rule="evenodd"
                      d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
            </svg> Loading...
        </div>
        <div v-if="!isLoading && properties.length === 0">
            No properties found.
        </div>
        <table class="table" v-if="properties.length > 0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Storeys</th>
                    <th>Garages</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="property in properties" :key="property.id">
                    <td>{{ property.name }}</td>
                    <td>{{ property.bedrooms }}</td>
                    <td>{{ property.bathrooms }}</td>
                    <td>{{ property.storeys }}</td>
                    <td>{{ property.garages }}</td>
                    <td>{{ property.price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style>
.bi-spin {
    -webkit-animation: bi-spin 2s infinite linear;
    animation: bi-spin 2s infinite linear;
}

.bi-pulse {
    -webkit-animation: bi-spin 1s infinite steps(8);
    animation: bi-spin 1s infinite steps(8);
}

@-webkit-keyframes bi-spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(359deg);
        transform: rotate(359deg);
    }
}

@keyframes bi-spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(359deg);
        transform: rotate(359deg);
    }
}
</style>

<script>
export default {
    data() {
        return {
            searchParams: {
                name: '',
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                price_min: null,
                price_max: null
            },
            properties: [],
            isLoading: false,
            isButtonDisabled: false
        };
    },

    created() {
        this.isLoading = true;
        axios
            .get('/api/properties')
            .then(response => {
                this.properties = response.data;
                this.isLoading = false;
            })
            .catch(error => {
                console.log(error);
                this.isLoading = false;
            });
    },

    methods: {
        submitForm() {
            this.properties = [];
            this.isLoading = true;
            this.isButtonDisabled = true;
            axios
                .get('/api/properties', { params: this.searchParams })
                .then(response => {
                    this.properties = response.data;
                    this.searchParams = {};
                    this.isLoading = false;
                })
                .catch(error => {
                    console.log(error);
                    this.isLoading = false;
                })
                .finally(() => {
                    this.isLoading = false;
                    this.isButtonDisabled = false;
                });
        }
    }
}
</script>
