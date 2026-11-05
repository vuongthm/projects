---
cover: ../media/overview.svg
id: personal-knowledge-space
title: Personal knowledge space
description: Chính không gian bạn đang khám phá. Một hệ thống xuất bản kiến thức đa nguồn, đa ngôn
  ngữ, với tìm kiếm, trải nghiệm đọc và trợ lý AI tùy chọn.
category: Web engineering
stack:
  - Next.js
  - TypeScript
  - Markdown
  - Gemini API
repository: https://github.com/vuongthm/vuongthm.github.io
status: active
year: "2026"
---

Chính không gian bạn đang khám phá. Một hệ thống xuất bản kiến thức đa nguồn, đa ngôn ngữ, với tìm kiếm, trải nghiệm đọc và trợ lý AI tùy chọn.

## Công nghệ sử dụng

- Next.js
- TypeScript
- Markdown
- Gemini API


## Mục tiêu

Một không gian thống nhất để đọc kiến thức, theo dõi dự án và khám phá những câu chuyện cá nhân. Nội dung được viết trong các repository riêng, còn website chịu trách nhiệm trình bày, tìm kiếm và xuất bản.

## Thiết kế hệ thống

Mỗi nguồn có `module.json` để mô tả loại nội dung. Compiler kiểm tra Markdown, liên kết và media trước khi tạo dữ liệu cho website tĩnh. Khi thêm module mới, trang có thể nhận diện nguồn và tạo danh mục tương ứng.

- Thư viện kiến thức với bộ lọc, tìm kiếm và mục lục khi đọc.
- Giao diện Việt, Anh, Nhật, Trung với nội dung gốc được giữ đúng ngôn ngữ.
- Truyện nhiều chương, trang giới thiệu dự án và album ảnh/video.
- Nội dung Markdown có mật khẩu riêng và mã hóa media đi kèm.

## Xuất bản nội dung

1. Viết hoặc sửa Markdown trong repo nội dung.
2. Kiểm tra local bằng `pnpm dev`.
3. Push repo nguồn để gửi thông báo cập nhật đến repo website.
4. Website kiểm tra dữ liệu, build và xuất bản bằng GitHub Actions.

## Điều mình tập trung

Giữ mã giao diện dùng chung, tách dữ liệu khỏi cách hiển thị, và làm rõ trạng thái có thể nhấn vào trên cả điện thoại lẫn máy tính. Việc mở rộng một chủ đề mới không nên buộc phải viết lại toàn bộ trang.
