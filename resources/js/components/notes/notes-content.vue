<template>
    <div class="content">
        <p class="date">{{ formatedDate }}</p>
        <textarea class="contentbox" v-if="note" v-model="note.content"></textarea>
    </div>
</template>

<script>
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

            if(this.note) {
                date = new Date(this.note.updated_at);
            } else {
                date = new Date();
            }

            return date.toLocaleString('en-gb', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            })
        }
    }
}
</script>

<style lang="scss">
    
</style>