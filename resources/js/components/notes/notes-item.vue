<template>
    <div class="list-group-item list-group-item-action" :class="{active: active}">
        <h5 class="mb-0 text-truncate">{{ firstline }}</h5>
        <div class="details">
            <p class="description ml-1 text-truncate">{{ secondline }}</p>
            <p v-text="updatedate" class="text-muted"></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        active: {
            type: Boolean,
            default: false,
            required: false
        },

        note: {
            type: Object,
            required: true
        }
    },

    computed: {
        firstline() {
            let contents = this.note.content;

            if(!contents) {
                return "New Note"
            }

            return contents.split('\n', 1)[0];
        },

        secondline() {
            let contents = this.note.content;

            if(contents) {
                return this.note.content;
            }
        },

        updatedate() {            
            let date = new Date(this.note.updated_at);

            return date.toLocaleString("en-gb", {
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit"
            });
        }
    }
}
</script>

<style lang="stylus" scoped>

</style>