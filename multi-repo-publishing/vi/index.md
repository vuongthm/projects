---
id: multi-repo-publishing
title: Multi-repo publishing
description: Viết ở nhiều repository, xuất bản trong một không gian. Hệ thống biên dịch Markdown, kiểm tra liên kết và đồng bộ nội dung cho website cá nhân.
cover: ../media/overview.svg
category: Developer tooling
stack:
  - Node.js
  - Markdown
  - GitHub Actions
  - WebP
repository: https://github.com/vuongthm/vuongthm.github.io/tree/main/scripts/content
status: active
year: "2026"
---

Một hệ thống nội dung để mỗi chủ đề có thể phát triển trong repository riêng, còn người đọc tìm thấy tất cả tại cùng một website. Đây là phần công cụ xuất bản đang được sử dụng cho chính không gian này.

## Bài toán

Ghi chép mạng, bảo mật, AI, câu chuyện và album có cách tổ chức khác nhau. Gom tất cả vào mã giao diện sẽ khó bảo trì; tách repo hoàn toàn lại dễ làm nội dung rời rạc. Mục tiêu là giữ quyền quản lý từng nguồn và thống nhất trải nghiệm đọc.

## Luồng xử lý

1. Khai báo repository trong `content.sources.json`, hoặc dùng các module local khi phát triển.
2. Đọc `module.json` để chọn adapter cho bài viết, truyện, dự án hoặc album.
3. Kiểm tra frontmatter, đường dẫn nội bộ và tài nguyên được tham chiếu.
4. Tạo dữ liệu giao diện, chỉ mục tìm kiếm và phiên bản ảnh phù hợp.
5. Build website tĩnh để xuất bản qua GitHub Pages.

## Những phần đã có

- Adapter dùng chung cho nhiều loại nội dung Markdown.
- Các ngôn ngữ và nội dung thay thế được xử lý tập trung.
- Ảnh PNG/JPEG được chuyển thành WebP khi cần.
- Mỗi file Markdown có thể đặt khóa riêng; nội dung và media đi kèm được mã hóa.
- Kiểm tra artifact để phát hiện liên kết hỏng và dữ liệu riêng bị xuất nhầm.

## Tích hợp repository mới

Thêm manifest của module, tổ chức Markdown theo ngôn ngữ và khai báo nguồn tại repo website. Workflow thông báo cập nhật từ repo nội dung có thể kích hoạt lại bản build; token và secrets cần được cấu hình trong GitHub trước khi dùng luồng này trên môi trường thật.

## Hướng phát triển

Tiếp tục cải thiện thông báo lỗi cho người viết, giữ schema ổn định và giảm thời gian build khi số lượng nội dung tăng. Các adapter hiện tại là điểm mở rộng cho module mới mà không phải sửa từng trang hiển thị.
