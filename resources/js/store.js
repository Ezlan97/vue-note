import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        noteLists: [],
        activeNote: [],
        loggedInUser: []
    },

    mutations: {
        INIT_NOTE_LIST(state, notes) {
            state.noteLists = notes
        },

        INIT_NOTE_ACTIVE(state, note) {
            state.activeNote = note
        },

        INIT_LOGGED_IN_USER(state, user) {
            state.loggedInUser = user
        }
    },

    actions: {
        initNoteList({commit}, notes) {
            commit('INIT_NOTE_LIST', notes);
        },

        initNoteActive({commit}, note) {
            commit('INIT_NOTE_ACTIVE', note);
        },

        initUser({commit}, user) {
            commit('INIT_LOGGED_IN_USER', user);
        }
    },

    getters: {

    }
})