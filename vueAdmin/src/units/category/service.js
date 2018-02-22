import request from '@/utils/request'
const url = '/v1/categories'

export function getAll() {
  return request({
    url: url,
    method: 'get'
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

export const formData = {
  name: '',
  attr: []
}

export const rules = {
  name: [
    {
      required: true,
      message: 'Please input category name',
      trigger: 'blur'
    },
    {
      min: 3,
      max: 255,
      message: 'Length should be 3 to 50 characters',
      trigger: 'blur'
    }
  ]
}
