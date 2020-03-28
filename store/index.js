import axios from 'axios'

export const state = () => ({
  menuIsOpen: false,
  popupIsOpen: false,
  products: [],
  selectedItem: [{
    title: 'Test',
    category: 'Werkzeuge',
    price: 15.00
  }]
})

export const mutations = {
  SAVE_PRODUCTS (state, products) {
    state.products = products
  },
  TOGGLE_MENU (state) {
    state.menuIsOpen = !state.menuIsOpen
  },
  ADD_ITEM (state, { title, category, price }) {
    state.selectedItem = [{
      title,
      category,
      price
    }]
  },
  TOOGLE_POPUP (state) {
    state.popupIsOpen = !state.popupIsOpen
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
  },
  addItem ({ commit }, item) {
    commit('ADD_ITEM', item)
  },
  tooglePopup ({ commit }) {
    commit('TOOGLE_POPUP')
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
  openMenu: state => state.menuIsOpen,
  openPopup: state => state.popupIsOpen,
  popupItem: state => state.selectedItem
}
