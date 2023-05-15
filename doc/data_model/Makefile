# --------------------------------------------------------------
# Makefile
# --------------------------------------------------------------

# ------------------------------
# シェルを指定する
# ------------------------------
SHELL=bash

# ------------------------------
# 使い方をプリントする
# ------------------------------
.PHONY: usage

_RED=\e[41m
RED_=\e[m
_GREEN=\e[42m
GREEN_=\e[m
_CYAN=\e[46m
CYAN_=\e[m

usage:
	@printf "$(_CYAN)Usage: make <target>$(CYAN_)\n"
	@printf "\n"
	@printf "target:\n"
	@printf "  html       Build html files\n"
	@printf "  pdf        Build pdf files\n"
	@printf "  all        Build all files\n"
	@printf "  clean      Clean built files and target files\n"
	@printf "  distclean  Clean all generated files\n"

# ------------------------------
# Python仮想環境をセットアップする
# ------------------------------
ifeq ($(shell which python3),)
    PYTHON_CLI := python
else
    PYTHON_CLI := python3
endif

VENV_DIR := ./venv
VENV_SETUP := $(VENV_DIR)/setup.mark
VENV_CLI := source $(VENV_DIR)/bin/activate

$(VENV_SETUP):
	@printf "$(_GREEN)Setup venv$(GREEN_)\n"
	$(PYTHON_CLI) -m venv --clear $(VENV_DIR)
	$(VENV_CLI); pip install -r requirements.txt
	touch $@

# ------------------------------
# 配布ファイルをビルドする
# ------------------------------
SRC_DIR := $(abspath ./src)
SRC_J2S := $(shell find $(SRC_DIR) -maxdepth 1 -name "*.md.j2")
SRC_MDS := $(shell find $(SRC_DIR) -mindepth 1 -name "*.md*")
BUILD_DIR := $(abspath ./build)
BUILD_MDS := $(subst $(SRC_DIR),$(BUILD_DIR),$(patsubst %.md.j2,%.md,$(SRC_J2S)))

$(BUILD_DIR)/%.md : $(SRC_DIR)/%.md.j2 $(SRC_J2S) $(SRC_MDS) $(VENV_SETUP)
	@printf "$(_GREEN)Build $< -> $@$(GREEN_)\n"
	mkdir -p $(dir $@)
	$(VENV_CLI); pushd $(SRC_DIR); j2 $< -o $@
	cp -f $(patsubst %.md.j2,%.css,$<) $(dir $@)

DIST_DIR := $(abspath ./dist)
DIST_HTMLS := $(subst $(BUILD_DIR),$(DIST_DIR),$(patsubst %.md,%.html,$(BUILD_MDS)))
DIST_PDFS := $(subst $(BUILD_DIR),$(DIST_DIR),$(patsubst %.md,%.pdf,$(BUILD_MDS)))

$(DIST_DIR)/%.html : $(BUILD_DIR)/%.md $(VENV_SETUP)
	@printf "$(_GREEN)Render $< -> $@$(GREEN_)\n"
	mkdir -p $(dir $@)
	$(VENV_CLI); cd $(DIST_DIR); pandoc $< --filter pandoc-plantuml -N -s --toc -c $(notdir $(patsubst %.md,%.css,$<)) -o $@
	cp -f $(patsubst %.md,%.css,$<) $(dir $@)

$(DIST_DIR)/%.pdf : $(BUILD_DIR)/%.md $(VENV_SETUP)
	@printf "$(_GREEN)Render $< -> $@$(GREEN_)\n"
	mkdir -p $(dir $@)
	$(VENV_CLI); cd $(DIST_DIR); pandoc $< --filter pandoc-plantuml -N -s --toc -c $(patsubst %.md,%.css,$<) --pdf-engine=lualatex -V documentclass=ltjarticle -o $@
	cp -f $(patsubst %.md,%.css,$<) $(dir $@)

# ------------------------------
# HTML版の配布ファイルをビルドする
# ------------------------------
.PHONY: html

html: $(BUILD_MDS) $(DIST_HTMLS)

# ------------------------------
# PDF版の配布ファイルをビルドする
# ------------------------------
.PHONY: pdf

pdf: $(BUILD_MDS) $(DIST_PDFS)

# ------------------------------
# 全ての配布ファイルをビルドする
# ------------------------------
.PHONY: all

all: html pdf

# ------------------------------
# 中間ファイルと配布を削除する
# ------------------------------
.PHONY: clean

clean:
	@printf "$(_GREEN)Clean built files$(GREEN_)\n"
	rm -rf $(BUILD_DIR)
	rm -rf $(DIST_DIR)

# ------------------------------
# 生成した全てのファイルを削除する
# ------------------------------
.PHONY: distclean

distclean:
	@printf "$(_GREEN)Clean all generated files$(GREEN_)\n"
	rm -rf $(DIST_DIR)
	rm -rf $(BUILD_DIR)
	rm -rf $(VENV_DIR)
