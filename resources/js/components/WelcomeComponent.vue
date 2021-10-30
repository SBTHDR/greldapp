<template>
    <div class="container">
        <h5 class="text-center mt-3">Welocme</h5>
        <router-link to="/create" class="btn btn-primary">Create</router-link>
        <div class="row mt-3">
            <div class="col-md-12  mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee in employees" :key="employee.id">
                                    <th scope="row">{{ employee.id }}</th>
                                    <td>{{ employee.name }}</td>
                                    <td>{{ employee.position }}</td>
                                    <td>{{ employee.email }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit', params: {id: employee.id}}"
                                            class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                employees: {}
            }
        },
        methods: {
            getEmployees() {
                axios.get('/employees').then((res) => {
                    this.employees = res.data
                }).catch((err) => {
                    console.log(err)
                })
            },
            deleteEmployee(employee_id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('/delete/' + employee_id).then((res) => {
                            this.getEmployees()
                        }).catch((err) => {
                            console.log(err);
                        })
                        Swal.fire(
                            'Deleted!',
                            'Employee has been deleted successfully',
                            'success'
                        )
                    }
                })
            }
        },
        mounted() {
            this.getEmployees()
        }
    }

</script>
