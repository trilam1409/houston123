import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Base from './Base';

export class Marketing extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/to-roi', header: '', params: '', json: '', des: '(NULL) Thông tin dữ liệu CSKH'},
      {id: 2, method: 'GET', url: '/api/call-hang-ngay', header: '', params: '', json: '', des: 'Thông tin dữ liệu gọi điện hằng ngày'},
      {id: 3, method: 'GET', url: '/api/call-data', header: '', params: '', json: '', des: 'Thông tin dữ liệu gọi điện'},
      {id: 4, method: 'GET', url: '/api/data-truong-tiem-nang', header: '', params: '', json: '', des: 'Thông tin dữ liệu trường tiềm năng'},
      {id: 5, method: 'GET', url: '/api/truong-tiem-nang', header: '', params: '', json: '', des: 'Thông tin trường tiềm năng'},
      {id: 6, method: 'GET', url: '/api/data-tuvan', header: '', params: '', json: '', des: '(NULL) Thông tin dữ liệu đi tư vấn'},
      {id: 7, method: 'GET', url: '/api/cskh', header: '', params: '', json: '', des: '(NULL) Thông tin dữ liệu CSKH'},
      {id: 8, method: 'GET', url: '/api/cskh-cu', header: '', params: '', json: '', des: 'Thông tin dữ liệu CSKH cũ'}

    
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export default class Account extends Component {
  state = {
    content: [
      {id: 1, method: 'POST', url: '/api/reigster', header: '', params: '{\n "fullname"\n "permission"\n "khuvuc"\n "loginID"\n "loginPASS"\n}', json: '{\n "code": 200,\n "account_id": "QL0148"\n}', des: 'Đăng ký tài khoản'},
      {id: 2, method: 'POST', url: '/api/reigster_info', header: '', params: '{\n "account_id"\n "available"\n "hinhanh"\n "sdt"\n "diachi"\n "loaiquanly"\n "email"\n "cmnd"\n}', json: '{\n "code": 200,\n "message": "Tạo giáo viên thành công"\n}\n{\n "code": 200,\n "message": "Tạo quản lý thành công"\n}', des: 'Sau khi đăng ký tài khoản thành công chuyển trang này để khai báo thông tin'},
      {id: 3, method: 'POST', url: '/api/login', header: '', params: '{\n "loginID"\n "loginPASS"\n}', json: '{\n "code": 200,\n "token": ""\n}', des: 'Đăng nhập'},
      {id: 4, method: 'GET', url: '/api/logout', header: 'Authorization: Bearer <token>', params:'', json: '{\n "code": 200,\n "message": "Đăng xuất thành công"\n}', des: 'Đăng xuất'},
      {id: 5, method: 'GET', url: '/api/account', header: 'Authorization: Bearer <token>', params: '', json: '', des: 'Trả về thông tin của tài khoản'},
      {id: 6, method: 'POST', url: '/api/change_pass', header: 'Authorization: Bearer <token>', params: '{\n "pass_old"\n "pass_new"\n "pass_confirm"\n}', json: '{\n "code": 422,\n "message": "Mật khẩu cũ không đúng"\n}\n{\n "code": 422,\n "message": "Mật khẩu xác nhận không trùng nhau"\n}\n{\n "code": 200,\n "message": "Thay đổi mật khẩu thành công"\n}', des: 'Thay đổi mật khẩu'},

    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class GV extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/giaovien', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/giaovien/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'PUT', url: '/api/giaovien/{id}', header: 'Content-type: application/json\nX-Requested-With: XMLHttpRequest', params: '{\n "hovaten"\n "hinhanh"\n "permission"\n "available"\n "sdt"\n "diachi"\n "email"\n "cmnd"\n "coso"\n "ngaynghi"\n "lydonghi"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 4, method: 'DELETE', url: '/api/giaovien/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
  
    ] 

      

  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class QL extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/quanly', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/quanly/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'PUT', url: '/api/quanly/{id}', header: '', params: '{\n "hovaten"\n "hinhanh"\n "permission"\n "available"\n "sdt"\n "diachi"\n "email"\n "cmnd"\n "chucvu"\n "coso"\n "ngaynghi"\n "lydonghi"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 4, method: 'DELETE', url: '/api/quanly/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class HocVien extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/hocvien', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/hocvien/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/hocvien', header: '', params: '{\n "hovaten"\n "hinhanh"\n "lop"\n "sdt"\n "diachi"\n "ngaysinh"\n "hoclucvao"\n" ngaynhaphoc"\n "truonghocchinh"\n "hohang"\n "tenNT1"\n "ngheNT1"\n "sdtNT1"\n "tenNT2"\n "ngheNT2"\n "sdtNT2"\n "lydobietHouston"\n "chinhthuc"\n "coso"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      //{id: 4, method: 'POST', url: '/api/hocvien{id}', header: '', params: '{\n "hovaten"\n "hinhanh"\n "lop"\n "sdt"\n "diachi"\n "ngaysinh"\n "hoclucvao"\n" ngaynhaphoc"\n "truonghocchinh"\n "hohang"\n "tenNT1"\n "ngheNT1"\n "sdtNT1"\n "tenNT2"\n "ngheNT2"\n "sdtNT2"\n "lydobietHouston"\n "chinhthuc"\n "coso"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/hocvien/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }

  
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}


export class CoSo extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/coso', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/coso/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/coso', header: '', params: '{\n "macoso"\n "tencoso"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/coso/{id}', header: '', params: '{\n "tencoso"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/coso/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class LoaiQL extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/loaiql', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/loaiql/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/loaiql', header: '', params: '{\n "loaiquanly"\n "permission_allow"\n "permission"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/loaiql/{loaiquanly}', header: '', params: '{\n "permission_allow"\n "permission"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/loaiql/{loaiquanly}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class MonHoc extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/monhoc', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/monhoc/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/monhoc', header: '', params: '{\n "ma"\n "ten"\n "bophanquanly"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/monhoc/{id}', header: '', params: '{\n "ten"\n "bophanquanly"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/monhoc/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class LopHoc extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/lophoc', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/lophoc/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/lophoc', header: '', params: '{\n "lop"\n "mamonhoc"\n "magiaovien"\n "batdau"\n "ketthuc"\n "coso"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/lophoc/{id}', header: '', params: '{\n "lop"\n "mamonhoc"\n "magiaovien"\n "batdau"\n "ketthuc"\n "coso"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/lophoc/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'}
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class PhongHoc extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/phonghoc', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/phonghoc/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/phonghoc', header: '', params: '{\n "coso"\n "succhua"\n "ghichu"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/apiphonghoc/{id}', header: '', params: '{\n "succhua"\n "ghichu"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/phonghoc/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class DkMonHoc extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/phonghoc', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/phonghoc/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/phonghoc', header: '', params: '{\n "coso"\n "succhua"\n "ghichu"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/phonghoc/{id}', header: '', params: '{\n "succhua"\n "ghichu"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/phonghoc/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class ChiTietLop extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/chitietlop', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/chitietlop/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/chitietlop', header: '', params: '{\n "mahocvien"\n "malop"\n "machuyenlop"\n "thoigianchuyen"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/chitietlop/{id}', header: '', params: '{\n "mahocvien"\n "malop"\n "machuyenlop"\n "thoigianchuyen"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/chitietlop/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}

export class CTrinhBoSung extends Component {
  state = {
    content: [
      {id: 1, method: 'GET', url: '/api/chitietlop', header: '', params: '', json: '', des: 'Lấy toàn bộ'},
      {id: 2, method: 'GET', url: '/api/chitietlop/{str}', header: '', params: '', json: '', des: 'Tìm kiếm'},
      {id: 3, method: 'POST', url: '/api/chitietlop', header: '', params: '{\n "mahocvien"\n "malop"\n "machuyenlop"\n "thoigianchuyen"\n}', json: '{\n"code": 200,\n"message": "Tạo thành công"\n}', des: 'Tạo mới'},
      {id: 4, method: 'PUT', url: '/api/chitietlop/{id}', header: '', params: '{\n "mahocvien"\n "malop"\n "machuyenlop"\n "thoigianchuyen"\n}', json: '{\n"code": 200,\n"message": "Cập nhật thành công"\n}', des: 'Cập nhật'},
      {id: 5, method: 'DELETE', url: '/api/chitietlop/{id}', header: '', params: '', json: '{\n"code": 200,\n"message": "Xóa thành công"\n}', des: 'Xóa'},
    ] 
  }
  render() {
    let content = null;
    content = (
      <div>
        {this.state.content.map((base) => {
          return <Base key={base.id} method={base.method} url={base.url} header={base.header} params={base.params} json={base.json} des={base.des} />
        })}
      </div>
    );
    return(
      <div>
        {content}
      </div>
    );  
  } 
}



if (document.getElementById('marketing')) {
  ReactDOM.render(<Marketing />, document.getElementById('marketing'));
}
if (document.getElementById('account')) {
  ReactDOM.render(<Account />, document.getElementById('account'));
}
if (document.getElementById('gv')) {
  ReactDOM.render(<GV />, document.getElementById('gv'));
}
if (document.getElementById('ql')) {
  ReactDOM.render(<QL />, document.getElementById('ql'));
}
if (document.getElementById('hocvien')) {
  ReactDOM.render(<HocVien />, document.getElementById('hocvien'));
}
if (document.getElementById('coso')) {
  ReactDOM.render(<CoSo />, document.getElementById('coso'));
}
if (document.getElementById('loaiql')) {
  ReactDOM.render(<LoaiQL />, document.getElementById('loaiql'));
}
if (document.getElementById('monhoc')) {
  ReactDOM.render(<MonHoc />, document.getElementById('monhoc'));
}
if (document.getElementById('lophoc')) {
  ReactDOM.render(<LopHoc />, document.getElementById('lophoc'));
}
if (document.getElementById('phonghoc')) {
  ReactDOM.render(<PhongHoc />, document.getElementById('phonghoc'));
}
// if (document.getElementById('monhoc')) {
//   ReactDOM.render(<DkMonHoc />, document.getElementById('dkmonhoc'));
// }
if (document.getElementById('monhoc')) {
  ReactDOM.render(<ChiTietLop />, document.getElementById('chitietlop'));
}
// if (document.getElementById('ctrinh_bosun')) {
//   ReactDOM.render(<CTrinhBoSung />, document.getElementById('ctrinh_bosun'));
// }