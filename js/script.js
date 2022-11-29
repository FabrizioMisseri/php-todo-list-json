const { createApp } = Vue;
createApp({

    data() {
        return {
            todoList: [],
            newTodo: '',
        };
    },
    created() {
        axios.get("server.php").then((resp) => {
            this.todoList = resp.data;
            console.log(this.todoList);
        });
    },

}).mount('#app');