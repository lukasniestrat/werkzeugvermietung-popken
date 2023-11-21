import axios from 'axios'

export const state = () => ({
  menuIsOpen: false,
  popupIsOpen: false,
  products: [],
  selectedItem: [],
  isLoading: true
})

export const mutations = {
  SAVE_PRODUCTS (state, products) {
    state.products = products
    state.isLoading = false
  },
  TOGGLE_MENU (state) {
    state.menuIsOpen = !state.menuIsOpen
  },
  ADD_ITEM (state, {
    title,
    category,
    price,
    newArticle = null,
    image = null,
    datasheet = null,
    description = null,
    transport = null
  }) {
    state.selectedItem = [{
      title,
      category,
      price,
      newArticle,
      image,
      datasheet,
      description,
      transport
    }]
  },
  TOGGLE_POPUP (state) {
    state.popupIsOpen = !state.popupIsOpen
  }
}

export const actions = {
  loadProducts ({ commit }) {
    axios.get('/data/products.json').then((response) => {
      const productArray = []
      const sortedProducts = response.data.sort((a, b) => parseFloat(b.id) - parseFloat(a.id))

      productArray.push(sortedProducts)
      commit('SAVE_PRODUCTS', sortedProducts)
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
  togglePopup ({ commit }) {
    commit('TOGGLE_POPUP')
  }
}

export const getters = {
  allProducts: state => state.products,
  newProducts: (state) => {
    return state.products.filter((product) => {
      return product.newArticle
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
  beerVehicles: (state) => {
    return state.products.filter((product) => {
      return product.category === 'Bierwagen'
    })
  },
  openMenu: state => state.menuIsOpen,
  openPopup: state => state.popupIsOpen,
  popupItem: state => state.selectedItem,
  loading: state => state.isLoading
}
