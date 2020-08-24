<template>

    <div class="wrapper container">
        <div class="notes">
            <notes-notification :notify="notification" />
            <div class="row">
                <div class="header col-md-12">
                    <notes-header @no-result-found="noResultFound"/>
                </div>
            </div>
            <div class="row">
                <div class="list col-md-4">
                    <notes-list :user="user"/>
                </div>
                <div class="contents col-md-8">
                    <notes-content :note="noteActive" :show="status" :user="user" />
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import NotesList from './notes-list.vue';
import NotesContent from './notes-content.vue';
import NotesHeader from './notes-header.vue';
import NotesNotification from './notes-notification.vue';

export default {
    components : {
        NotesList,
        NotesContent,
        NotesHeader,
        NotesNotification,
    },

    props: {
        user: {
            type: Object,
        }
    },

    data() {
        return {
            activeNote: null,
            notification: null,
            status: null
        }
    },

    methods: {
        noResultFound(noti) {
            this.notification = noti;
        }
    },

    computed: {
        noteActive() {
            return this.$store.state.activeNote
        }
    },

    mounted() {
        console.log('mounted')
    }
}
</script>

<style lang="scss">
    .wrapper {
        align-items: center;
        display: flex;
        height: 100vh;
    }

    .notes {
        flex-grow: 1;

        .contents {
            height: 80vh;
            padding-left: 0%;
        }

        .list {
            height: 80vh;
            padding-right: 0%;    
        }
    }
</style>