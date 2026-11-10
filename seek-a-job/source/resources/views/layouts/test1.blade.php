-- Insert 10 user accounts for recruiters
INSERT INTO users (id, email, password, role, phone) VALUES
(80, 'recruiter80@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKogdEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234561'),
(81, 'recruiter81@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEffa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234562'),
(82, 'recruiter82@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEda3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234563'),
(83, 'recruiter83@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234564'),
(84, 'recruiter84@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEfdfa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234565'),
(85, 'recruiter85@company.com', '$2y$10$92IXUNpkjO0lyrOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234566'),
(86, 'recruiter86@company.com', '$2y$10$92IXUNpkjO0rOQ5hfbyMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234567'),
(87, 'recruiter87@company.com', '$2y$10$92IhfgXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234568'),
(88, 'recruiter88@company.com', '$2y$10jf$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234569'),
(89, 'recruiter89@company.com', '$2y$jf10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recruiter', '0901234570');

-- Insert 10 companies
INSERT INTO companies (id, name, industry, employee_count, description) VALUES
(80, 'Tech Innovations Inc', 'Technology', 250, 'Leading software development company'),
(81, 'Global Finance Group', 'Finance', 500, 'International financial services firm'),
(82, 'Health Solutions Ltd', 'Healthcare', 300, 'Innovative medical technology provider'),
(83, 'Green Energy Dynamics', 'Renewable Energy', 150, 'Sustainable energy solutions company'),
(84, 'Creative Marketing Co', 'Marketing', 100, 'Digital marketing and branding agency'),
(85, 'Education Pioneers', 'Education', 200, 'Educational technology and consulting'),
(86, 'Manufacturing Masters', 'Manufacturing', 400, 'Advanced industrial manufacturing'),
(87, 'Retail Revolution', 'Retail', 600, 'Innovative retail and e-commerce platform'),
(88, 'Research Innovations', 'Research', 180, 'Scientific research and development'),
(89, 'Hospitality Experts', 'Hospitality', 350, 'Global hospitality management firm');

-- Insert recruiters
INSERT INTO recruiters (user_id, company_id) VALUES
(80, 80), (81, 81), (82, 82), (83, 83), (84, 84),
(85, 85), (86, 86), (87, 87), (88, 88), (89, 89);

-- Insert company locations
INSERT INTO company_locations (id, company_id, house_number, street, ward, district, city) VALUES
(80, 80, '123', 'Tech Park Road', 'Ward 9', 'District 2', 'Ho Chi Minh City'),
(81, 81, '456', 'Finance Street', 'Ward 3', 'District 1', 'Hanoi'),
(82, 82, '789', 'Medical Complex', 'Ward 5', 'District 7', 'Ho Chi Minh City'),
(83, 83, '101', 'Green Energy Avenue', 'Ward 2', 'District 3', 'Da Nang'),
(84, 84, '202', 'Marketing Plaza', 'Ward 4', 'District 1', 'Ho Chi Minh City'),
(85, 85, '303', 'Education Boulevard', 'Ward 6', 'District 2', 'Hanoi'),
(86, 86, '404', 'Industrial Zone', 'Ward 8', 'District 9', 'Ho Chi Minh City'),
(87, 87, '505', 'Retail Center', 'Ward 7', 'District 1', 'Hanoi'),
(88, 88, '606', 'Research Park', 'Ward 1', 'District 4', 'Da Nang'),
(89, 89, '707', 'Hospitality Lane', 'Ward 5', 'District 3', 'Ho Chi Minh City');

-- Insert categories
INSERT INTO categories (name) VALUES
('Software Development'),
('Finance'),
('Healthcare'),
('Renewable Energy'),
('Marketing'),
('Education'),
('Manufacturing'),
('Retail'),
('Research'),
('Hospitality');

-- Insert jobs with varied categories
INSERT INTO jobs (company_id, location_id, title, description, requirements, benefits, salary, status, is_featured) VALUES
(80, 80, 'Senior Software Engineer', 'Develop cutting-edge software solutions', 'Bachelor''s in Computer Science', 'Competitive salary, stock options', '1000-1500 USD', 'approved', 1),
(80, 80, 'Cloud Infrastructure Architect', 'Design and implement cloud systems', '5+ years cloud experience', 'Remote work, health insurance', '1200-1800 USD', 'approved', 0),
(80, 80, 'AI/ML Research Scientist', 'Advanced machine learning research', 'PhD in Computer Science', 'Research grants, conferences', '1500-2000 USD', 'approved', 1),
(81, 81, 'Financial Analyst', 'Analyze financial market trends', 'Bachelor''s in Finance', 'Performance bonus, training', '800-1200 USD', 'approved', 0),
(81, 81, 'Investment Banking Associate', 'Manage corporate financial strategies', 'MBA preferred', 'High commission, travel allowance', '1200-1800 USD', 'approved', 1),
(81, 81, 'Risk Management Specialist', 'Develop risk mitigation strategies', 'Financial risk certification', 'Comprehensive benefits', '900-1300 USD', 'approved', 0),
(82, 82, 'Medical Device Engineer', 'Design innovative medical technologies', 'Biomedical Engineering degree', 'Research opportunities', '1000-1500 USD', 'approved', 1),
(82, 82, 'Healthcare IT Specialist', 'Implement medical software systems', 'IT and Healthcare background', 'Healthcare training', '800-1200 USD', 'approved', 0),
(82, 82, 'Clinical Research Coordinator', 'Manage medical research projects', 'Research experience', 'Publication support', '900-1300 USD', 'approved', 1),
(83, 83, 'Renewable Energy Engineer', 'Design sustainable energy solutions', 'Environmental Engineering', 'Green technology training', '900-1400 USD', 'approved', 1),
(83, 83, 'Solar Project Manager', 'Manage solar installation projects', 'Project management certification', 'Travel opportunities', '1100-1600 USD', 'approved', 0),
(83, 83, 'Energy Efficiency Consultant', 'Develop energy conservation strategies', 'Energy management background', 'Performance bonuses', '800-1200 USD', 'approved', 1),
(84, 84, 'Digital Marketing Specialist', 'Create digital marketing campaigns', 'Marketing degree', 'Creative workplace', '700-1100 USD', 'approved', 0),
(84, 84, 'Brand Strategy Consultant', 'Develop brand positioning', 'Branding experience', 'Agency awards', '900-1300 USD', 'approved', 1),
(84, 84, 'Social Media Manager', 'Manage social media strategies', 'Strong social media skills', 'Flexible working', '600-1000 USD', 'approved', 0);

-- Insert job categories
INSERT INTO job_categories (job_id, category_id)
SELECT j.id, c.id
FROM jobs j
JOIN companies co ON j.company_id = co.id
JOIN categories c ON (
    (co.industry = 'Technology' AND c.name = 'Software Development') OR
    (co.industry = 'Finance' AND c.name = 'Finance') OR
    (co.industry = 'Healthcare' AND c.name = 'Healthcare') OR
    (co.industry = 'Renewable Energy' AND c.name = 'Renewable Energy') OR
    (co.industry = 'Marketing' AND c.name = 'Marketing') OR
    (co.industry = 'Education' AND c.name = 'Education') OR
    (co.industry = 'Manufacturing' AND c.name = 'Manufacturing') OR
    (co.industry = 'Retail' AND c.name = 'Retail') OR
    (co.industry = 'Research' AND c.name = 'Research') OR
    (co.industry = 'Hospitality' AND c.name = 'Hospitality')
);
