# Đóng góp dự án

Mỗi bài giới thiệu nằm trong `<project-id>/vi/index.md`, có thể thêm bản dịch ở `en/index.md`. Đặt ảnh tại `<project-id>/media/`.

```markdown
---
id: projects-new-project
title: Tên dự án
description: Bài toán và kết quả chính.
status: draft
date: 2026-11-11
year: "2026"
category: Software
stack: [TypeScript]
repository: https://example.com/source
cover: ../media/cover.jpg
---

## Giới thiệu

Mục tiêu, tính năng, ảnh minh họa, lựa chọn thiết kế và cách sử dụng.
```

Link repository phải dẫn tới source đúng của dự án. ID cần duy nhất; bản dịch dùng cùng ID. Có thể dùng README có frontmatter làm nội dung dự án; giữ các file đó khi cập nhật bài.

Danh mục cây chỉ đường xếp dự án mới trước theo `publishedAt` hoặc `date`. Dự án cũ chưa có ngày dùng `year`; các dự án cùng năm và không có ngày giữ thứ tự hiện có. Dùng ngày xuất bản thực tế khi thêm dự án mới. Danh sách tự cuộn khi có nhiều dự án; không cần sửa giao diện để thêm bảng chỉ đường.

## Gửi thay đổi

1. Tạo nhánh hoặc fork, sửa đúng nội dung và ngôn ngữ liên quan.
2. Giữ ID/slug cũ khi sửa bài; giữ chung ID hoặc `translationKey` giữa các bản dịch.
3. Kiểm tra cú pháp, code/ví dụ và nguồn tham khảo. Chỉ dùng media có quyền sử dụng.
4. Giữ bài mới ở trạng thái draft để review. Ghi rõ nội dung và cách kiểm tra trong PR.

Không đưa credential, nội dung cá nhân chưa được phép công khai, dependencies hoặc cache vào PR. Các thiết lập vận hành do maintainer quản lý; không cần yêu cầu khóa cá nhân để gửi đóng góp.
