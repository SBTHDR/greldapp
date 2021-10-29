<template>
    <div class="container">
        <h5 class="text-center mt-3">Edit Entry</h5>
        <div class="row mt-3">
            <div class="col-md-12  mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" v-model="employee.name">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control" v-model="employee.position">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" v-model="employee.email">
                        </div>
                        <div class="form-group">
                            <button @click.prevent="update" class="btn btn-primary">Update</button>
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
                employee: {}
            }
        },
        methods: {
            getEmployee() {
                axios.get('/edit/' + this.$route.params.id).then((res) => {
                    this.employee = res.data
                }).catch((err) => {
                    console.log(err)
                })
            },
            update() {
                axios.post('/update/' + this.$route.params.id, this.employee).then((res) => {
                    this.$router.push('/')
                    this.$toaster.info('Employee Updated Successfully!')
                }).catch((err) => {
                    console.log(err)
                })
            }
        },
        mounted() {
            this.getEmployee()
        }
    }

</script>
