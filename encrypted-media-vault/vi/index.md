---
{
  "id": "encrypted-media-vault",
  "cover": "../media/overview.svg",
  "title": "Encrypted Media Vault",
  "description": "Kho ảnh và video mã hóa ngay trên trình duyệt, tách nội dung công khai và bộ sưu tập riêng.",
  "category": "Privacy engineering",
  "stack": [
    "Web Crypto",
    "AES-256-GCM",
    "TypeScript"
  ],
  "repository": "https://github.com/vuongthm/vuongthm.github.io/tree/main/components/vault",
  "status": "active",
  "year": "2026",
  "order": 20,
  "translations": {
    "ja": {
      "description": "公開メディアと非公開コレクションを分けた、写真・動画の暗号化アーカイブ。"
    },
    "zh": {
      "description": "将公开媒体与私人收藏分开的加密照片和视频档案。"
    }
  }
}
---

## Tổng quan

Một phần của website này: lưu ảnh và video dưới dạng mã hóa, chỉ mở được bằng mật khẩu của bộ sưu tập. Website tĩnh chỉ phát hành các tệp đã mã hóa; tệp gốc và mật khẩu nằm ngoài bản xuất bản.

## Cách hoạt động

- Tạo khóa bằng PBKDF2 rồi mã hóa AES-256-GCM.
- Mở nội dung trực tiếp trong trình duyệt, không gửi mật khẩu qua URL.
- Giải phóng ảnh đã mở và khóa lại khi rời tab hoặc không hoạt động.

## Điều mình học được

Quản lý khóa và vòng đời bộ nhớ quan trọng không kém thuật toán mã hóa. Giao diện phải giải thích rõ trạng thái khóa, nhận biết mật khẩu sai và cho phép quay lại an toàn.

## Mã nguồn

Dự án hiện nằm trong module `components/vault` của website. Liên kết mã nguồn bên dưới mở đúng thư mục triển khai.
