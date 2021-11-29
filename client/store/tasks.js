export const state = () => ({
  list: []
})

export const getters = {
  list(state) {
      return state.list
  },
  completed(state) {
    return state.list.filter(item => item.status === 1)
  },
}

export const mutations = {
  setList(state, data) {
      state.list = data
  },
  addToList(state, data) {
    const items = [...state.list]
    items.push(data)
    state.list = items
  },
  updateItemInList(state, data) {
    const items = [...state.list]
    const indexToUpdate = items.findIndex(item => item.id === data.id)
    if (indexToUpdate !== -1) {
      items[indexToUpdate] = data
      state.list = items
    }
  },
  deleteTask(state, data) {
    const tmp = [...state.list]
    const index = tmp.findIndex(item => item.id === data)
    if (index === -1){
      return;
    }
    tmp.splice(index, 1)
    return state.list = tmp
  },
  setStatus(state, {id, status}) {
    const tmp = [...state.list]
    const index = tmp.findIndex(item => item.id === id)
    if (index === -1){
      return;
    }
    tmp[index].status = status
    return state.list = tmp
  }
}


export const actions = {
  async fetchList({commit}) {
      const res = await this.$axios.get('tasks')
      commit('setList', res)
  },
  delete({commit}, id) {
    this.$axios.delete('tasks/' + id)
    commit('deleteTask', id)
  },
  async add({commit}, data) {
    const response = await this.$axios.post('tasks', data)
    commit('addToList', response)
  },
  async update({commit}, data) {
    await this.$axios.put('tasks/' + data.id, data)
    commit('updateItemInList', data)
  },
  toggleComplete({commit}, task) {
    const data = {
      ...task
    }
    data.status = task.status == 1 ? 0 : 1
    this.$axios.put('tasks/' + task.id, data)
    commit('setStatus', {id: task.id, status: data.status})
  }
}
