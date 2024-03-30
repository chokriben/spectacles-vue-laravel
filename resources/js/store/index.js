import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate';
import Pizzasstore from './modules/articleFeature'

export default createStore({
modules: {
    Pizzasstore
},
plugins: [createPersistedState()],
})
