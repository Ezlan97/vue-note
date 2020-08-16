<template>

    <div class="wrapper container">
        <div class="notes">

            <div class="row">
                <div class="header col-md-12">
                    <p>header</p>
                </div>
            </div>

            <div class="row">
                <div class="list col-md-4">
                    <notes-list @note-clicked="onNoteClicked"/>
                </div>
                <div class="contents col-md-8">
                    <notes-content :note="activeNote" />
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import NotesList from './notes-list.vue';
import NotesContent from './notes-content.vue';

export default {
    components : {
        NotesList,
        NotesContent
    },

    data() {
        return {
            activeNote: null
        }
    },

    methods: {
        onNoteClicked(note) {
            this.activeNote = note;
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

        .header {
            background-color: greenyellow;            
        }

        .list {
            height: 80vh;
        }
    }

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
</style>