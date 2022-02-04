<template>
    <div>
        <h2 class="text-center">Challenge List</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <!--<th>Actions</th>-->
            </tr>
            </thead>
            <tbody>
            <tr v-for="challenge in challenges" :key="challenge.id">
                <td>{{ challenge.id }}</td>
                <td>{{ challenge.title }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link
                            :to="{name: 'edit', params: {id: challenge.id}}" class="btn btn-success"
                        >
                            Edit
                        </router-link>
                        <button
                            class="btn btn-danger"
                            @click="deleteProduct(challenge.id)">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {challenges: []}
    },
    created() {
        this.axios.get('http://localhost/api/challenge/').then(response => {
            this.challenges = response.data.data;
        });
    },
    methods: {
        deleteProduct(id) {
            this.axios.delete(`http://localhost/api/challenge/${id}`).then(response => {
                let i = this.challenges.map(data => data.id).indexOf(id);
                this.challenges.splice(i, 1)
            });
        }
    }
}
</script>
