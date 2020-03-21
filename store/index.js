import axios from 'axios'

export const state = () => ({
  products: []
})

export const mutations = {
  SAVE_PRODUCTS (state, products) {
    state.products = products
  }
}

export const actions = {
  loadProducts ({ commit }) {
    axios.get('/data/products.json').then((response) => {
      commit('SAVE_PRODUCTS', response.data)
    }).catch((error) => {
      throw new Error(`API ${error}`)
    })
  }
}

export const getters = {
  allProducts: state => state.products,
  topProducts: (state) => {
    return state.products.filter((product) => {
      return product.topArticle
    })
  },
  tools: (state) => {
    return state.products.filter((product) => {
      return product.category === 'Werkzeuge'
    })
  },
  gardenTools: (state) => {
    return state.products.filter((product) => {
      return product.category === 'Gartengeräte'
    })
  },
  toilets: (state) => {
    return state.products.filter((product) => {
      return product.category === 'WC-Wagen'
    })
  },
  partySupplies: (state) => {
    return state.products.filter((product) => {
      return product.category === 'Partyzubehör'
    })
  },
  trailer: (state) => {
    return state.products.filter((product) => {
      return product.category === 'Anhänger'
    })
  }
}
