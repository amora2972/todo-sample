export const state = () => ({
  list: []
})

export const getters = {
  list(state) {
      return state.list
  }
}

export const mutations = {
  setList(state, data) {
      state.list = data
  },
}


export const actions = {
  async fetchList({commit}) {
      const res = await this.$axios.get('users')
      commit('setList', res)
  },
}
