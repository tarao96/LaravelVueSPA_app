<template>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form v-on:submit.prevent="submit">
                <div class="form-group row">
                    <label for="id" class="col-sm-3 form-control-label">ID</label>
                    <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="task.id">
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 form-control-label">Title</label>
                    <input type="text" class="col-sm-9 form-control" v-model="task.title">
                </div>
                <div class="form-group row">
                    <label for="content" class="col-sm-3 form-control-label">Content</label>
                    <input type="text" class="col-sm-9 form-control" v-model="task.content">
                </div>
                <div class="form-group row">
                    <label for="person-in-charge" class="col-sm-3 form-control-label">Person In Charge</label>
                    <input type="text" class="col-sm-9 form-control" v-model="task.person_in_charge">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            taskId: String,
        },
        data: function() {
            return {
                task: {}
            }
        },
        methods: {
            getTask() {
                axios.get('/api/tasks/' + this.taskId)
                    .then((res) => {
                        this.task = res.data;
                    });
            },
            submit() {
                console.log(this.taskId);
                console.log(this.task);
                axios.put('/api/tasks/' + this.taskId, this.task)
                    .then((res) => {
                        console.log(res);
                        this.$router.push({name: 'task.list'});
                    });
            }
        },
        mounted() {
            this.getTask();
        }
    }
</script>
