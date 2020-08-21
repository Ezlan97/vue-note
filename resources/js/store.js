import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        noteLists: [],
        activeNote: []        
    },

    mutations: {
        INIT_NOTE_LIST(state, notes) {
            state.noteLists = notes
        }
    },

    actions: {
        initNoteList({commit}, notes) {
            commit('INIT_NOTE_LIST', notes);
        },
    },

    getters: {

    }
})