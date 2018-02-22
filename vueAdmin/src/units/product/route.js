import Layout from '@/views/layout/Layout'

const route = {
  path: '/products',
  component: Layout,
  redirect: '/products/index',
  name: 'products',
  meta: { title: 'Products', icon: 'eye' },
  children: [
    {
      path: 'index',
      name: 'All products',
      component: require('@/units/product/views/index.vue').default,
      meta: { title: 'Table', icon: 'table' }
    },
    {
      path: 'create',
      name: 'Create product',
      component: require('@/units/product/views/create.vue').default,
      meta: { title: 'New', icon: 'form' }
    },
    {
      path: 'edit/:id',
      name: 'Edit product',
      hidden: true,
      component: require('@/units/product/views/edit.vue').default,
      meta: { title: 'Edit', icon: 'form' }
    }
  ]
}
export default route
