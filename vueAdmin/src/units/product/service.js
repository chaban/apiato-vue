import request from '@/utils/request'
const url = '/v1/products'

export function getAll(query) {
  return request({
    url: url,
    method: 'get',
    params: query
  })
}

export function getItem(id) {
  return request({
    url: url + '/' + id,
    method: 'get'
  })
}

export function createItem(data) {
  return request({
    url,
    method: 'post',
    data
  })
}

export function updateItem(id, data) {
  return request({
    url: url + '/' + id,
    method: 'patch',
    data
  })
}

export function deleteItem(id) {
  return request({
    url: url + '/' + id,
    method: 'delete'
  })
}

export function getCategories() {
  return request({
    url: '/v1/categories',
    method: 'get',
    params: { 'flat': true }
  })
}

export const tableDataQuery = {
  page: 1,
  limit: 10,
  sortedBy: 'desc',
  orderBy: 'updated_at',
  search: null
}

export const rules = {
  name: [
    {
      required: true,
      message: 'Please input product name',
      trigger: 'blur'
    },
    {
      min: 3,
      max: 255,
      message: 'Length should be 3 to 255 characters',
      trigger: 'blur'
    }
  ],
  price: [
    {
      required: true,
      message: 'Please input product price',
      trigger: 'blur'
    },
    {
      type: 'number', message: 'price must be a number', trigger: 'blur'
    }
  ]
}

export const formData = {
  category_id: null,
  name: '',
  desc: '',
  price: '',
  attr: {}
}
