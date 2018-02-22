import Layout from '@/views/layout/Layout'

const route = {
  path: '/brands',
  component: Layout,
  redirect: '/brands/index',
  name: 'Brands',
  meta: { title: 'Brands', icon: 'example' },
  children: [
    {
      path: 'index',
      name: 'All brands',
      component: require('@/units/brand/views/index.vue').default,
      meta: { title: 'Table', icon: 'table' }
    },
    {
      path: 'create',
      name: 'Create brand',
      component: require('@/units/brand/views/create.vue').default,
      meta: { title: 'New', icon: 'form' }
    },
    {
      path: 'edit/:id',
      name: 'Edit brand',
      hidden: true,
      component: require('@/units/brand/views/edit.vue').default,
      meta: { title: 'Edit', icon: 'form' }
    }
  ]
}
export default route
