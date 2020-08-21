import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        noteLists: [],
        activeNote: []      
    },

    mutations: {
        INIT_NOTE_LIST(state, notes) {
            state.noteLists = notes
        },

        INIT_NOTE_ACTIVE(state, note) {
            state.activeNote = note
        }
    },

    actions: {
        initNoteList({commit}, notes) {
            commit('INIT_NOTE_LIST', notes);
        },

        initNoteActive({commit}, note) {
            commit('INIT_NOTE_ACTIVE', note);
        },
    },

    getters: {

    }
})