import Layout from '@/views/layout/Layout'

const route = {
  path: '/categories',
  component: Layout,
  redirect: '/categories/index',
  name: 'categories',
  meta: { title: 'Categories', icon: 'tree' },
  children: [
    {
      path: 'index',
      name: 'All categories',
      component: require('@/units/category/views/index.vue').default,
      meta: { title: 'Tree', icon: 'table' }
    },
    {
      path: 'edit/:id',
      name: 'Edit category',
      hidden: true,
      component: require('@/units/category/views/edit.vue').default,
      meta: { title: 'Edit', icon: 'form' }
    }
  ]
}
export default route
