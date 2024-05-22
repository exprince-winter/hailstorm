

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favour`
--

CREATE TABLE `favour` (
  `userid` int(11) NOT NULL,
  `tweetid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `userid` int(11) NOT NULL,
  `personid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `bweet` int(11) NOT NULL,
  `reporter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `user` text NOT NULL,
  `timestamp` int(8) NOT NULL,
  `method` text NOT NULL DEFAULT 'web',
  `methodlink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `timezone` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 1,
  `data` text NOT NULL,
  `bio` text NOT NULL DEFAULT '',
  `location` text NOT NULL DEFAULT '',
  `web` text NOT NULL DEFAULT '',
  `bg` text NOT NULL DEFAULT '/images/bg.gif',
  `bgcolor` text NOT NULL DEFAULT '#9ae4e8',
  `bgrepeat` text NOT NULL DEFAULT 'no-repeat',
  `side` text NOT NULL DEFAULT '#e0ff92',
  `sideborder` text NOT NULL DEFAULT '#87bc44',
  `text` text NOT NULL DEFAULT '#333333',
  `link` text NOT NULL DEFAULT '#0000ff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

