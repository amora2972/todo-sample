export default function ({ $axios, redirect }) {
  $axios.onResponse(response => {
      return Promise.resolve(response.data.result);
  })
}
