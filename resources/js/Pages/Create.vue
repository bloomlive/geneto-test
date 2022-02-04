<template>
    <div>
        <h3 class="text-center">Create challenge</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addChallenge">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="challenge.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="challenge.description">
                    </div>
                    <div class="form-group">
                        <label>Start date</label>
                        <input type="date" class="form-control" v-model="challenge.start_date">
                    </div>
                    <div class="form-group">
                        <label>End date</label>
                        <input type="date" class="form-control" v-model="challenge.end_date">
                    </div>
                    <div class="form-group">
                        <label>Public</label>
                        <input type="checkbox" v-model="challenge.is_public">
                    </div>
                    <div class="form-group">
                        <label>DaysWith1000Steps</label>
                        <input type="radio" :value="0" v-model="challenge.type">
                        <label>DaysWith3Meals</label>
                        <input type="radio" value="1" v-model="challenge.type">
                        <label>TotalWorkOutMinutes</label>
                        <input type="radio" :value="2" v-model="challenge.type">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {challenge: {}}
    },
    methods: {
        addChallenge() {
            this.axios.post('http://localhost/api/challenge', this.challenge).then(response => (this.$router.push({name: 'home'})))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>
