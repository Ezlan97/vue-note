<template>
    <div class="content">
        <p class="date">{{ formatedDate }}</p>
        <textarea
            class="contentbox form-control"
            v-if="note"
            @keyup="updateNote"
            v-model="note.content"
            id="content"
        ></textarea>
    </div>
</template>

<script>
import _ from "lodash";

export default {
    props: {
        note: {
            type: Object,
            required: false
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
    background-color: white;
}
</style>
