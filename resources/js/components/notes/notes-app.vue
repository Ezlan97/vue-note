<template>

    <div class="wrapper container">
        <div class="notes">
            <notes-notification :notify="notification" />
            <div class="row">
                <div class="header col-md-12">
                    <notes-header @no-result-found="noResultFound" @result-found="onNoteClicked"/>
                </div>
            </div>
            <div class="row">
                <div class="list col-md-4">
                    <notes-list @note-clicked="onNoteClicked" @new-note="onNoteClicked" :user="user"/>
                </div>
                <div class="contents col-md-8">
                    <notes-content :note="activeNote" :show="status" :user="user" />
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
        onNoteClicked(note) {
            this.activeNote = note;
        },

        noResultFound(noti) {
            this.notification = noti;
        }
    },    
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