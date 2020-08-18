<template>
    <div class="content bg-light shadow-sm">
        <br />
        <p class="date text-center">{{ formatedDate }}</p>
        <div class="container">
            <textarea
                class="contentbox form-control"
                v-if="note || show == true"
                @keyup="updateNote"
                v-model="note.content"
                id="content"
            ></textarea>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        note: {
            type: Object,
            required: false
        },

        stats : {
            type: Boolean,
            required: false
        }
    },

    data() {
      return {
        show: false,
      }
    },

    computed: {
        formatedDate() {
            let date = null;

            if (this.note) {
                date = new Date(this.note.updated_at);
            } else {
                date = new Date();
            }

            return date.toLocaleString("en-gb", {
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit"
            });
        }
    },

    methods: {
        // patch content and add debounce
        updateNote: _.debounce(function() {
            //check if function called succesfully
            console.log("success : method save note called");
            console.log("Content : " + this.note.content);

            //ready new variable
            let updatedContent = this.note;

            //call api and update
            console.log("debounce this content : " + this.note.content);
            axios
                .patch("api/notes/update/" + this.note.id, {
                    content: updatedContent.content
                })
                .then(res => {
                    console.log("api data = " + res.data);
                });
        }, 1000)
    }
};
</script>

<style lang="scss">
.form-control {
    display: block;
    width: 100%;
    height: calc(1.6em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.content {
    height: 80vh;
}
</style>
