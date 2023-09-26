<template>
    <div>
        <h4 class="text-center">All resipes</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Author</th>
                <th>Discrption</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="resipe in resipes" :key="resipe.id">
                <td>{{ resipe.id }}</td>
                <td>{{ resipe.name }}</td>
                <td>{{ resipe.author }}</td>
                <td>{{ resipe.created_at }}</td>
                <td>{{ resipe.updated_at }}</td>
                <td>{{resipr.discrption}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editresipe', params: { id: resipe.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteresipe(resipe.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/resipes/add')">Add resipe</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            resipes: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/resipes')
                .then(response => {
                    this.resipes = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteresipe(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/resipes/delete/${id}`)
                    .then(response => {
                        let i = this.resipes.map(item => item.id).indexOf(id); // find index of your object
                        this.resipes.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>