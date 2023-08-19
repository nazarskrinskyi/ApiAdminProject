<template>
    <div class="card mt-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-send mr-2 icon-inline">
                        <path d="M22 2L11 13"></path>
                        <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>
                    </svg>
                    Telegram
                </h6>
                <span class="text-secondary">{{ telegram ?? 'NaN' }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-send mr-2 icon-inline">
                        <path d="M22 2L11 13"></path>
                        <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>
                    </svg>
                    Telegram
                </h6>
                <span class="text-secondary">{{ telegram ?? 'NaN' }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-twitter mr-2 icon-inline text-info">
                        <path
                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                    </svg>
                    Twitter
                </h6>
                <span class="text-secondary">{{ twitter ?? 'NaN' }}</span>

            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-instagram mr-2 icon-inline text-danger">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                    Instagram
                </h6>
                <span class="text-secondary">{{ instagram ?? 'NaN' }}</span>

            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-facebook mr-2 icon-inline text-primary">
                        <path
                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                    Facebook
                </h6>
                <span class="text-secondary">{{ facebook ?? 'NaN' }}</span>
            </li>

        </ul>
    </div>
</template>

<script>

export default {
    data() {
        return {
            telegram: null,
            twitter: null,
            instagram: null,
            facebook: null,
            editPersonId: null,
        }
    },

    mounted() {
        this.getPeople()

    },
    methods: {

        getPeople() {
            axios.get('/api/persons')
                .then(request => {
                    this.persons = request.data;
                })
        },

        updatePerson(id) {
            this.editPersonId = null;
            axios.patch(`/api/persons/${id}`, {
                name: this.name,
                surname: this.surname,
                age: this.age
            })
                .then(request => {
                    console.log(request)
                    this.person = request.data;
                    this.getPeople();
                })
        },


        changeEditPersonId(id, name, age, surname) {
            this.editPersonId = id
            let edit = `edit_${id}`;
            this.name = name
            this.$refs[edit][0].age = age
            this.$refs[edit][0].surname = surname
            console.log(this.$refs[edit].name)
        },

        activeEditor(id) {
            return id === this.editPersonId;
        },

    },
    components: {

    }
}
</script>
