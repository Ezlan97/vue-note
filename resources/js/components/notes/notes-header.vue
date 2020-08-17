<template>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand">Simply Note</a>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" v-model="search" placeholder="Search" aria-label="Search" @keypress="searchContent"/>
    </form>
  </nav>
</template>

<script>
export default {
    data() {
        return {
            search: null,
            noti: null,
        }
    },

    methods: {
        searchContent: _.debounce(function () { 
            console.log(this.search);
            axios.post("api/notes/search", {
                search: this.search,
            })
            .then((res) => {
                let note = res.data[0];
                if(!res.data.length) {                    
                    console.log("no result found!");
                    this.noti = [];
                    //notification status and message
                    this.noti.push(
                        {type: 'failed', message: 'No result found for keyword ' + this.search}
                    );
                    console.log(this.noti);
                    this.$emit('no-result-found', this.noti);
                } else {
                    console.log("result found!");
                    this.$emit('result-found', note);
                }
            });
        }, 1000),
    },
};
</script>

<style lang="scss"></style>
