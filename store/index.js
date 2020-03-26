import axios from 'axios'

export const state = () => ({
  products: [],
  menuOpen: false
})

export const mutations = {
  SAVE_PRODUCTS (state, products) {
    state.products = products
  },
  TOGGLE_MENU (state) {
    state.menuOpen = !state.menuOpen
  }
}

export const actions = {
  loadProducts ({ commit }) {
    axios.get('/data/products.json').then((response) => {
      commit('SAVE_PRODUCTS', response.data)
    }).catch((error) => {
      throw new Error(`API ${error}`)
    })
  },
  toggleMenu ({ commit }) {
    commit('TOGGLE_MENU')
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
      return product.category === 'Partyzeltzubehör'
    })
  },
  trailer: (state) => {
    return state.products.filter((product) => {
      return product.category === 'Anhänger'
    })
  },
  openMenu: state => state.menuOpen
}
