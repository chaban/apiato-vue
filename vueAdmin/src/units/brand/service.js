import request from '@/utils/request'
const url = '/v1/brands'

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
