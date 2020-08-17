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
        }
    },

    methods: {
        searchContent: _.debounce(function () { 
            console.log(this.search);
            axios.post("api/notes/search", {
                search: this.search,
            })
            .then((res) => {
                if(!res.data.lenght) {                    
                    console.log("no result found!");
                } else {

                }
            });
        }, 1000),
    },
};
</script>

<style lang="scss"></style>
