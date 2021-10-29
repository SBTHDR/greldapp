<template>
    <div class="container">
        <h5 class="text-center mt-3">Create Entry</h5>
        <div class="row mt-3">
            <div class="col-md-12  mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" v-model="formData.name">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control" v-model="formData.position">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" v-model="formData.email">
                        </div>
                        <div class="form-group">
                            <button @click.prevent="create" class="btn btn-primary">Entry</button>
                            <router-link to="/" class="btn btn-primary">Back To Home</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formData: {
                    name: '',
                    position: '',
                    email: '',
                }
            }
        },
        methods: {
            create() {
                axios.post('/create', this.formData).then((res) => {
                    this.$router.push('/')
                    this.$toaster.success('Employee Created Successfully!')
                }).catch((err) => {
                    console.log(err)
                })
            }
        }
    }

</script>
