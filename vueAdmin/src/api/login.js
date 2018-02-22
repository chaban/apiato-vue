import request from '@/utils/request'

export function login(email, password) {
  return request({
    url: '/v1/clients/web/admin/login',
    method: 'post',
    data: {
      email,
      password
    }
  })
}

export function getInfo(token) {
  return request({
    url: '/v1/getUserInfo',
    method: 'get'
  })
}

export function logout(token) {
  return request({
    url: '/v1/logout',
    method: 'delete',
    params: { token }
  })
}
