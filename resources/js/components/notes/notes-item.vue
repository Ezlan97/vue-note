<template>
    <div class="list-group-item list-group-item-action" :class="{active: active}">
        <h5 class="mb-0 text-truncate">{{ firstline }}</h5>
        <div class="details d-flex">
            <span class="date">{{ updatedate }}</span>
            <span class="description ml-1 text-truncate">{{ secondline }}</span>
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
            return new Date(this.note.updated_at);
        }
    }
}
</script>

<style lang="stylus" scoped>

</style>