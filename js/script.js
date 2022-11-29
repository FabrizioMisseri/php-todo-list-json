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
    methods: {
        pushData() {
            const data = {
                newTodo: this.newTodo,
            };

            axios
                .post("server.php", data, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then((resp) => {
                    this.todoList = resp.data;
                    this.newTodo = "";
                });
        },
    },

}).mount('#app');